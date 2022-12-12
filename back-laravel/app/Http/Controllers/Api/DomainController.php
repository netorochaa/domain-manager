<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DomainRequest;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    public function index()
    {
        return Domain::query()
            ->select('id', 'name', 'tld')
            ->get();
    }

    public function store(DomainRequest $request)
    {
        Domain::create(
            $request->safe()->only(['name', 'tld'])
        );

        return response()->json('Domain created');
    }

    public function edit(Domain $domain)
    {
        return response()->json($domain);
    }

    public function update(Domain $domain, DomainRequest $request)
    {
        $domain->update(
            $request->safe()->only(['name', 'tld'])
        );

        return response()->json('Domain updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Domain $domain)
    {
        //
    }
}
