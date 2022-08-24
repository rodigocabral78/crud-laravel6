<?php

namespace App\Modules\Api\User\Services;

use App\Modules\Api\User\Models\User;
use App\Modules\Api\User\Services\UserSearchService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserService
{
	public function index(Request $request)
	{
		$userSearchService = new UserSearchService();
		#return $userSearchService->search(User::with([]), $request);
		$data = $userSearchService(User::with([]), $request)->toArray();
		return [
			'total_count' => $data['total'],
			'limit' => $data['per_page'],
			'data' => $data['data'],
			'paginate' => [
				'path_url' => $data['path'],
				'first_page' => $data['first_page_url'],
				'prev_page' => $data['prev_page_url'],
				'current_page' => $data['current_page'],
				'next_page' => $data['next_page_url'],
				'last_page' => $data['last_page_url'],
				'from' => $data['from'],
				'to' => $data['to'],
			],
		];
	}

	public function show($id)
	{
		# $user = User::findOrFail($id);
		$user = User::find($id);

		return $user;
	}

	public function store($request)
	{
		$validator = Validator::make($request->all(), [
		]);

		if($validator->errors()->count()) {
			throw new \Exception($validator->errors()->first(),400);
		}

		if(!$validator->errors()->count()) {
			$data = [
				"name" => $request->name,
				"email" => $request->email,
				"email_verified_at" => $request->email_verified_at,
				"password" => $request->password,
				"remember_token" => $request->remember_token,
			];
			return User::create($data);
		}
	}

	public function update($request, $id)
	{
		# $user = User::find($id);

		$validator = Validator::make($request->all(), [
		]);

		if($validator->errors()->count()) {
			throw new \Exception($validator->errors()->first(),400);
		}

		if(!$validator->errors()->count()) {
			$data = [
				"name" => $request->name,
				"email" => $request->email,
				"email_verified_at" => $request->email_verified_at,
				"password" => $request->password,
				"remember_token" => $request->remember_token,
			];
			$user = User::find($id)->update($data);
		}
		return $user;
	}

	public function destroy($id)
	{
		$user = User::find($id)->delete();
		return $user;
	}
}