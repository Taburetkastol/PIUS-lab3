<?php

namespace App\Http\ApiV1\Controllers;

use Illuminate\Http\Request;
use App\Http\ApiV1\Controllers\Controller;  
use App\Domain\Catalog\Actions\MembershipActions\GetMembershipAction;
use App\Domain\Catalog\Actions\MembershipActions\CreateMembershipAction;
use App\Domain\Catalog\Actions\MembershipActions\DeleteMembershipAction;
use App\Domain\Catalog\Actions\MembershipActions\PatchMembershipAction;
use App\Domain\Catalog\Actions\MembershipActions\PutMembershipAction;
use App\Http\ApiV1\Requests\MembershipRequests\CreateMembershipRequest;
use App\Http\ApiV1\Requests\MembershipRequests\PutMembershipRequest;
use App\Http\ApiV1\Requests\MembershipRequests\PatchMembershipRequest;
use App\Http\ApiV1\Resources\MembershipResource;

class MembershipController extends Controller
{
    public static string $errorCode = '200';
    public static string $errorMessage = 'OK';

    public function getMembership(int $membershipId, GetMembershipAction $action)
    {   
        $membership = new MembershipResource($action->execute($membershipId));
        return response()->json($membership, MembershipController::$errorCode);
    }

    public function createMembership(CreateMembershipRequest $request,
                            CreateMembershipAction $action
    ) {
        $membership = new MembershipResource($action->execute($request->all()));
        return response()->json($membership, MembershipController::$errorCode);
    }

    public function changeMembership(int $membershipId,
                        PutMembershipRequest $request,
                        PutMembershipAction $action
    ) {
        $membership = new MembershipResource($action->execute($membershipId, $request));
        return response()->json($membership, MembershipController::$errorCode);        
    }

    public function changeMembershipsParameters(int $membershipId,
                        PatchMembershipRequest $request,
                        PatchMembershipAction $action
    ) {
        $membership = new MembershipResource($action->execute($membershipId, $request->all()));
        return response()->json($membership, MembershipController::$errorCode);
    }

    public function deleteMembership(int $membershipId, DeleteMembershipAction $action)
    {
        $membership = new MembershipResource($action->execute($membershipId));
        return response()->json($membership, MembershipController::$errorCode);
    }   
}
