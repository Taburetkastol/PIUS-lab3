<?php

namespace App\Domain\Catalog\Actions\MembershipActions;
use App\Domain\Catalog\Models\Membership;
use App\Http\ApiV1\Requests\MembershipRequests\PatchMembershipRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MembershipController;

class PatchMembershipAction
{
    public function execute(int $membershipId, array $fields)
    {
        $membership = Membership::findOrFail($membershipId);
        $membership->update($fields);

        return $membership;
    }
}