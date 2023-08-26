<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(
        protected SupportService $service
    ) {
    }

    public function index(Request $request)
    {

        $supports = $this->service->getAll($request->filter);

        dd($supports);
        return view('admin/support/index', compact('supports'));
    }

    public function show(string | int $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return redirect()->back();
        }

        return view('admin/support/show', compact('support'));
    }

    public function create()
    {
        return view('admin/support/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {

        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('support.index');
    }

    public function edit(string $id)
    {
        //if(!$support = Support::where('id', $id)->first()){
        if (!$support = $this->service->findOne($id)) {
            return redirect()->back();
        }

        return view('admin/support/edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
        $support =  $this->service->update(
            UpdateSupportDTO::makeFromRequest($request)
        );

        if (!$support) {
            return redirect()->back();
        }

        return redirect()->route('support.index');
    }

    public function destroy(string $id)
    {

        $this->service->delete($id);

        return redirect()->route('support.index');
    }
}
