<?php

namespace App\Livewire\Admin\Onboarding;

use App\Enums\KycStatus;
use App\Models\Kyc;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.admin')]
#[Title('KYC Review Queue')]
class KycPendingList extends Component
{
    use WithPagination;

    /**
     * Current filter state.
     */
    #[Url(keep: true)]
    public string $status = 'pending';

    /**
     * Search query.
     */
    #[Url(keep: true)]
    public string $search = '';

    /**
     * Sort column.
     */
    #[Url(keep: true)]
    public string $sortBy = 'submitted_at';

    /**
     * Sort direction.
     */
    #[Url(keep: true)]
    public string $sortDirection = 'asc';

    /**
     * Get filtered and paginated KYC submission.
     */
    #[Computed]
    public function kycs()
    {
        return Kyc::query()
            ->with(['user:id,name,email,phone'])
            ->when($this->status === KycStatus::PENDING->value, fn($q) => $q->pending())
            ->when($this->status === KycStatus::APPROVED->value, fn($q) => $q->approved())
            ->when($this->status === KycStatus::REJECTED->value, fn($q) => $q->rejected())
            ->when($this->search, function ($q) {
                $q->whereHas('user', function ($query) {
                    $query->where('name', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%");
                });
            })
            ->paginate(20);
    }

    /**
     * Get dashboard statistics.
     */
    // #[Computed]
    // public function stats()
    // {
    //     return [
    //         'pending' => Kyc::pending()->count(),
    //     ];
    // }

    /**
     * Get dashboard statistics.
     */
    #[Computed]
    public function stats()
    {
        return [
            'pending' => Kyc::pending()->count(),
            'approved_today' => Kyc::approved()
                ->whereDate('verified_at', today())
                ->count(),
            'rejected_today' => Kyc::rejected()
                ->whereDate('updated_at', today())
                ->count(),
        ];
    }

    /**
     * Change filter status.
     */
    public function filterByStatus(string $status): void
    {
        $this->status = $status;
        $this->resetPage();
    }

    /**
     * Navigate to KYC review detail.
     */
    public function reviewKyc(int $kycId): void
    {
        $this->redirectRoute('admin.kyc.review', ['kyc' => $kycId], navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.onboarding.kyc-pending-list');
    }
}
