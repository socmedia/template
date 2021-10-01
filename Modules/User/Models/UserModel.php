<?php

namespace Modules\User\Models;

use App\Models\User;
use App\Utillities\Generate;
use Closure;
use Illuminate\Contracts\Pagination\Paginator;

class UserModel
{
    /**
     * Define variable
     *
     * @var User $user
     */
    public $user;

    /**
     * Class constructor.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all users from resource
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $condition
     * @return Paginator
     */
    public function getAll($request, Closure $condition = null): Paginator
    {
        /**
         * @property array $request->select
         */
        $select = property_exists($request, 'select')
        ? $request->select
        : '*';
        $users = $this->user->select($select);

        // If any filters
        if (property_exists($request, 'filters')) {
            // Do something
        }

        // Additional condition
        if ($condition) {
            call_user_func($condition, 'query');
        }

        return $users->orderBy(
            property_exists($request, 'orderBy') ? $request->orderBy : 'created_at',
            property_exists($request, 'sort') ? $request->sort : 'desc',
        )->simplePaginate(
            property_exists($request, 'perPage') ? $request->perPage : 10
        );
    }

    public function findById($id, Closure $condition = null): User
    {
        $user = $this->user->where('id', $id);

        // Additional condition
        if ($condition) {
            call_user_func($condition, 'query');
        }

        return $user->firstOrFail();
    }

    public function findByEmail($email, Closure $condition = null): User
    {
        $user = $this->user->where('email', $email);

        // Additional condition
        if ($condition) {
            call_user_func($condition, 'query');
        }

        return $user->firstOrFail();
    }

    public function createAccount($request): User
    {
        return $this->user->create([
            'id' => Generate::ID(32),
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }

    public function update($request, $id)
    {

    }

    // $ip = request()->ip()
    // $information = [
    //      'place_of_brith' => $request->place_of_birth,
    //      'date_of_brith' => $request->date_of_birth,
    //      'bio' => $request->bio,
    //      'gender' => $request->gender,
    //      'area_code' => $request->area_code,
    //      'phone' => $request->phone,
    //      'province_id' => $request->province,
    //      'regency_id' => $request->regency,
    //      'district_id' => $request->district,
    //      'address' => $request->address,
    //      'login_info' => \Location::get($ip),
    //      'avatar_url' => $request->photo,
    //      'allow_shares' => 1,
    //      'private_mode' => 0,
    //      'facebook' => $request->facebook,
    //      'instagram' => $request->instagram,
    //      'linkedin' => $request->linkedin,
    //      'tiktok' => $request->tiktok,
    // ];

    //     $data = [
    // 'approved_at' => now()->toDateTimeString(),
    //             'approved_by' => auth()->user()->id,
    //             'deactivated_reasons' => $request->deactivated_reasons,
    //             'deactivated_at' => null,
    //             ]
}