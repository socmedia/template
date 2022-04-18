<?php

namespace Modules\Front\Http\Livewire\FloatCard;

use App\Services\PaginateCollection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AgentLocation extends Component
{
    /**
     * Form properties
     *
     * @var array
     */
    public $form = [
        'search' => null,
    ];

    public $perPage = 8, $isHomePage;

    /**
     * Run this function while component redered
     *
     * @return void
     */
    public function mount($isHomePage)
    {
        if (!cache('agents')) {
            $this->updateAgentsCache();
        }

        $this->isHomePage = $isHomePage;
    }

    /**
     * Get all agents from another server
     *
     * @return Cache
     */
    public function updateAgentsCache()
    {
        $res = Http::get('https://ica.rosin-group.com/olive/public_api/agen_json/1000');
        $mapped = array_map(function ($array) {
            return (object) $array;
        }, $res->json());

        $collected = collect($mapped);

        return Cache::remember('agents', 28800, function () use ($collected) {
            return $collected->where('agen_aktif', 'y');
        });
    }

    /**
     * Updated hooks
     *
     * @return void
     */
    public function updated()
    {
        $this->perPage = 8;
    }

    /**
     * Load more data
     *
     * @return void
     */
    public function loadMore()
    {
        $this->perPage += 8;
    }

    /**
     * Get and collect all agents
     *
     * @return collection
     */
    public function getAllAgents()
    {
        $agents = collect(cache('agents'));

        if ($this->form['search']) {
            $agents = $agents->map(function ($agent) {
                if (
                    preg_match("/{$this->form['search']}/i", $agent->tlc) ||
                    preg_match("/{$this->form['search']}/i", $agent->nama_agen) ||
                    preg_match("/{$this->form['search']}/i", $agent->alamat_agen) ||
                    preg_match("/{$this->form['search']}/i", $agent->no_telp)
                ) {
                    return $agent;
                }
            });
        }

        return PaginateCollection::paginate($agents->whereNotNull(), $this->perPage);
    }

    public function render()
    {
        return view('front::livewire.float-card.agent-location', [
            'agents' => $this->getAllAgents(),
        ]);
    }
}