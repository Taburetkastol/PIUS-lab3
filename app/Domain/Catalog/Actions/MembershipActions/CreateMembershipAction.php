<?php

namespace App\Domain\Catalog\Actions\MembershipActions;
use App\Domain\Catalog\Models\Membership;
use App\Http\ApiV1\Requests\MembershipRequests\CreateMembershipRequest;
use App\Http\ApiV1\Controllers\MembershipController;    

class CreateMembershipAction
{
    public function execute(array $request)
    {
        $membership = Membership::create($request);

        return $membership;
    }
}