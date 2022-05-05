<?php

namespace App\Domain\Catalog\Actions\MembershipActions;
use App\Domain\Catalog\Models\Membership;
use App\Http\ApiV1\Requests\MembershipRequests\GetMembershipRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MembershipController;

class GetMembershipAction
{
    public function execute(int $membershipId)
    {
        $membership = Membership::findOrFail($membershipId);

        return $membership;       
    }
}