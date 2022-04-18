<?php

namespace Modules\Lead\Http\Livewire\Lead;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Lead\Constants\LeadStatus;
use Modules\Lead\Entities\Lead;
use Modules\Lead\Services\Lead\LeadQuery;
use Modules\Lead\Services\Lead\TableConfig;
use Modules\Lead\Services\Lead\TableFilterActions;

class Table extends Component
{
    use WithPagination, TableConfig, TableFilterActions;

    /**
     * Define query string props
     *
     * @var string
     */
    public $category, $status, $is_readed, $sort = 'created_at', $order = 'desc', $search, $destroyId, $perPage = 10;

    public $lead, $new_status;

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Nama',
            'column_name' => 'name',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Email',
            'column_name' => 'email',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Telp.',
            'column_name' => 'phone',
            'sortable' => true,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Terbaca',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Status',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
        [
            'cell_name' => 'Aksi',
            'column_name' => null,
            'sortable' => false,
            'order' => null,
            'additional_class' => null,
        ],
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->mountDefaultValues();
    }

    /**
     * Define livewire query string
     *
     * @var array
     */
    protected $queryString = [
        'category',
        'status',
        'is_readed',
        'sort',
        'order',
        'search',
    ];

    public function updated($component, $value)
    {
        if ($component == 'new_status') {
            return $this->updateStatus($this->lead->id, Str::title(unSlug($value)));
        }
    }

    /**
     * Get all leads from database
     *
     * @return void
     */
    public function getAll()
    {
        return (new LeadQuery())->filters((object) [
            'category' => $this->category,
            'status' => $this->status,
            'is_readed' => $this->is_readed,
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ], $this->perPage);
    }

    /**
     * Update lead status
     *
     * @param  int $id
     * @param  string $status
     * @return void
     */
    public function updateStatus($id, $status)
    {
        $lead = Lead::find($id);

        if ($lead) {
            $lead->status = $status;
            $lead->save();

            return session()->flash('success', 'Status lead berhasil diperbarui.');
        }
        return session()->flash('failed', 'Data lead tidak ditemukan.');
    }

    /**
     * Update lead read status
     *
     * @param  int $id
     * @return void
     */
    public function isReaded($id)
    {
        $lead = Lead::find($id);

        if ($lead) {
            $lead->is_readed = $lead->is_readed === 1 ? 0 : 1;
            $lead->save();

            return session()->flash('success', 'Status lead berhasil diperbarui.');
        }

        return session()->flash('failed', 'Data lead tidak ditemukan.');

    }

    /**
     * Show lead data
     *
     * @param  int $id
     * @return void
     */
    public function show($id)
    {
        if ($this->lead) {
            if ($this->lead->id == $id) {
                return $this->reset('lead', 'new_status');
            }
        }

        $lead = Lead::find($id);

        if ($lead) {
            $this->lead = $lead;
            $this->newStatus = slug($lead->status);
            $lead->is_readed = 1;
            $lead->save();

            return $this->dispatchBrowserEvent('show-modal');
        }

        return session()->flash('failed', 'Data lead tidak ditemukan.');
    }

    public function resetLead()
    {
        $this->reset('lead', 'new_status');
    }

    /**
     * Destroy lead from database
     *
     * @return void
     */
    public function destroy()
    {
        $lead = Lead::find($this->destroyId);

        if ($lead) {
            $lead->delete();
            return session()->flash('success', 'Leadingan berhasil dihapus.');
        }

        return session()->flash('failed', 'Data lead tidak ditemukan.');
    }

    public function render()
    {
        return view('lead::livewire.lead.table', [
            'leads' => $this->getAll(),
            'lead_statuses' => (new LeadStatus())->getAll(),
        ]);
    }
}