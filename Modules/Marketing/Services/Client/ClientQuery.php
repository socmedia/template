<?php

namespace Modules\Marketing\Services\Client;

use Modules\Marketing\Entities\Client;

class ClientQuery extends Client
{
    /**
     * Get public clients
     *
     * @return void
     */
    public function getPublicClients()
    {
        return Client::query()
            ->where('is_active', 1)
            ->orderBy('position')
            ->get();
    }

    /**
     * Get last position of testimonials
     *
     * @return void
     */
    public function getLastPosition()
    {
        return Client::query()
            ->getLastPosition()->first();
    }

    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return void
     */
    public function filters(object $request, $total = 10)
    {
        $clients = Client::query();

        // Check if props below is true/not empty
        if ($request->is_active) {
            // Search query
            $clients->isActive($request);
        }

        // Check if props below is true/not empty
        if ($request->search) {
            // Search query
            $clients->search($request);
        }

        return $clients->sort($request)->paginate($total);
    }
}