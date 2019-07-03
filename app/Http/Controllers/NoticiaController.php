<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Repositories\NoticiaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class NoticiaController extends AppBaseController
{
    /** @var  NoticiaRepository */
    private $noticiaRepository;

    public function __construct(NoticiaRepository $noticiaRepo)
    {
        $this->noticiaRepository = $noticiaRepo;
    }

    /**
     * Display a listing of the Noticia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $noticias = $this->noticiaRepository->all();

        return view('noticias.index')
            ->with('noticias', $noticias);
    }

    /**
     * Show the form for creating a new Noticia.
     *
     * @return Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created Noticia in storage.
     *
     * @param CreateNoticiaRequest $request
     *
     * @return Response
     */
    public function store(CreateNoticiaRequest $request)
    {
        $input = $request->all();

        $noticia = $this->noticiaRepository->create($input);

        Flash::success('Noticia saved successfully.');

        return redirect(route('noticias.index'));
    }

    /**
     * Display the specified Noticia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $noticia = $this->noticiaRepository->find($id);

        if (empty($noticia)) {
            Flash::error('Noticia not found');

            return redirect(route('noticias.index'));
        }

        return view('noticias.show')->with('noticia', $noticia);
    }

    /**
     * Show the form for editing the specified Noticia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $noticia = $this->noticiaRepository->find($id);

        if (empty($noticia)) {
            Flash::error('Noticia not found');

            return redirect(route('noticias.index'));
        }

        return view('noticias.edit')->with('noticia', $noticia);
    }

    /**
     * Update the specified Noticia in storage.
     *
     * @param int $id
     * @param UpdateNoticiaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoticiaRequest $request)
    {
        $noticia = $this->noticiaRepository->find($id);

        if (empty($noticia)) {
            Flash::error('Noticia not found');

            return redirect(route('noticias.index'));
        }

        $noticia = $this->noticiaRepository->update($request->all(), $id);

        Flash::success('Noticia updated successfully.');

        return redirect(route('noticias.index'));
    }

    /**
     * Remove the specified Noticia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $noticia = $this->noticiaRepository->find($id);

        if (empty($noticia)) {
            Flash::error('Noticia not found');

            return redirect(route('noticias.index'));
        }

        $this->noticiaRepository->delete($id);

        Flash::success('Noticia deleted successfully.');

        return redirect(route('noticias.index'));
    }
}
