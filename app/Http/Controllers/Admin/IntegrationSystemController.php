<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIntegrationSystemRequest;
use App\Http\Requests\StoreIntegrationSystemRequest;
use App\Http\Requests\UpdateIntegrationSystemRequest;
use App\Models\IntegrationSystem;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IntegrationSystemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('integration_system_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $integrationSystems = IntegrationSystem::all();

        return view('admin.integrationSystems.index', compact('integrationSystems'));
    }

    public function create()
    {
        abort_if(Gate::denies('integration_system_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.integrationSystems.create');
    }

    public function store(StoreIntegrationSystemRequest $request)
    {
        $integrationSystem = IntegrationSystem::create($request->all());

        return redirect()->route('admin.integration-systems.index');
    }

    public function edit(IntegrationSystem $integrationSystem)
    {
        abort_if(Gate::denies('integration_system_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.integrationSystems.edit', compact('integrationSystem'));
    }

    public function update(UpdateIntegrationSystemRequest $request, IntegrationSystem $integrationSystem)
    {
        $integrationSystem->update($request->all());

        return redirect()->route('admin.integration-systems.index');
    }

    public function show(IntegrationSystem $integrationSystem)
    {
        abort_if(Gate::denies('integration_system_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.integrationSystems.show', compact('integrationSystem'));
    }

    public function destroy(IntegrationSystem $integrationSystem)
    {
        abort_if(Gate::denies('integration_system_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $integrationSystem->delete();

        return back();
    }

    public function massDestroy(MassDestroyIntegrationSystemRequest $request)
    {
        $integrationSystems = IntegrationSystem::find(request('ids'));

        foreach ($integrationSystems as $integrationSystem) {
            $integrationSystem->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
