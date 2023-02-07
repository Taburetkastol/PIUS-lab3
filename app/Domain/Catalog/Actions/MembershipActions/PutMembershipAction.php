<?php

namespace App\Domain\Catalog\Actions\MembershipActions;
use App\Domain\Catalog\Models\Membership;
use App\Http\ApiV1\Requests\MembershipRequests\PutMembershipRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MembershipController;

class PutMembershipAction
{
    public function execute(int $membershipId, PutMembershipRequest $request)
    {
        $membership = Membership::findOrFail($membershipId);
        $membership->update($request->all());
        
        return $membership;
    }
}