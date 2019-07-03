<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNovedadesRequest;
use App\Http\Requests\UpdateNovedadesRequest;
use App\Repositories\NovedadesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NovedadesController extends AppBaseController
{
    /** @var  NovedadesRepository */
    private $novedadesRepository;

    public function __construct(NovedadesRepository $novedadesRepo)
    {
        $this->novedadesRepository = $novedadesRepo;
    }

    /**
     * Display a listing of the Novedades.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $novedades = $this->novedadesRepository->all();

        return view('novedades.index')
            ->with('novedades', $novedades);
    }

    /**
     * Show the form for creating a new Novedades.
     *
     * @return Response
     */
    public function create()
    {
        return view('novedades.create');
    }

    /**
     * Store a newly created Novedades in storage.
     *
     * @param CreateNovedadesRequest $request
     *
     * @return Response
     */
    public function store(CreateNovedadesRequest $request)
    {
        $input = $request->all();

        $novedades = $this->novedadesRepository->create($input);

        Flash::success('Novedades saved successfully.');

        return redirect(route('novedades.index'));
    }

    /**
     * Display the specified Novedades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $novedades = $this->novedadesRepository->find($id);

        if (empty($novedades)) {
            Flash::error('Novedades not found');

            return redirect(route('novedades.index'));
        }

        return view('novedades.show')->with('novedades', $novedades);
    }

    /**
     * Show the form for editing the specified Novedades.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $novedades = $this->novedadesRepository->find($id);

        if (empty($novedades)) {
            Flash::error('Novedades not found');

            return redirect(route('novedades.index'));
        }

        return view('novedades.edit')->with('novedades', $novedades);
    }

    /**
     * Update the specified Novedades in storage.
     *
     * @param int $id
     * @param UpdateNovedadesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNovedadesRequest $request)
    {
        $novedades = $this->novedadesRepository->find($id);

        if (empty($novedades)) {
            Flash::error('Novedades not found');

            return redirect(route('novedades.index'));
        }

        $novedades = $this->novedadesRepository->update($request->all(), $id);

        Flash::success('Novedades updated successfully.');

        return redirect(route('novedades.index'));
    }

    /**
     * Remove the specified Novedades from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $novedades = $this->novedadesRepository->find($id);

        if (empty($novedades)) {
            Flash::error('Novedades not found');

            return redirect(route('novedades.index'));
        }

        $this->novedadesRepository->delete($id);

        Flash::success('Novedades deleted successfully.');

        return redirect(route('novedades.index'));
    }
}
