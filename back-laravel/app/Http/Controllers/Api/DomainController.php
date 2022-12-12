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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function show(Domain $domain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Domain  $domain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Domain $domain)
    {
        //
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
