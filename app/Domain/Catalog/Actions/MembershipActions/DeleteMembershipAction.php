<?php

namespace App\Domain\Catalog\Actions\MembershipActions;
use App\Domain\Catalog\Models\Membership;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\ApiV1\Controllers\MembershipController;

class DeleteMembershipAction
{
    public function execute(int $membershipId)
    {
        $membership = Membership::findOrFail($membershipId);
        $membership->delete();

        return $membership;
    }
}