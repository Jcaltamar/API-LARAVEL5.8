<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\CreateNoticiaAPIRequest;
use App\Http\Requests\API\UpdateNoticiaAPIRequest;
use App\Models\Noticia;
use App\Repositories\NoticiaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NoticiaController
 * @package App\Http\Controllers
 */

class NoticiaAPIController extends AppBaseController
{
    /** @var  NoticiaRepository */
    private $noticiaRepository;

    public function __construct(NoticiaRepository $noticiaRepo)
    {
        $this->noticiaRepository = $noticiaRepo;
    }

    /**
     * Display a listing of the Noticia.
     * GET|HEAD /noticias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $noticias = $this->noticiaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($noticias->toArray(), 'Noticias retrieved successfully');
    }

    /**
     * Store a newly created Noticia in storage.
     * POST /noticias
     *
     * @param CreateNoticiaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNoticiaAPIRequest $request)
    {
        $input = $request->all();

        $noticia = $this->noticiaRepository->create($input);

        return $this->sendResponse($noticia->toArray(), 'Noticia saved successfully');
    }

    /**
     * Display the specified Noticia.
     * GET|HEAD /noticias/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Noticia $noticia */
        $noticia = $this->noticiaRepository->find($id);

        if (empty($noticia)) {
            return $this->sendError('Noticia not found');
        }

        return $this->sendResponse($noticia->toArray(), 'Noticia retrieved successfully');
    }

    /**
     * Update the specified Noticia in storage.
     * PUT/PATCH /noticias/{id}
     *
     * @param int $id
     * @param UpdateNoticiaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNoticiaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Noticia $noticia */
        $noticia = $this->noticiaRepository->find($id);

        if (empty($noticia)) {
            return $this->sendError('Noticia not found');
        }

        $noticia = $this->noticiaRepository->update($input, $id);

        return $this->sendResponse($noticia->toArray(), 'Noticia updated successfully');
    }

    /**
     * Remove the specified Noticia from storage.
     * DELETE /noticias/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Noticia $noticia */
        $noticia = $this->noticiaRepository->find($id);

        if (empty($noticia)) {
            return $this->sendError('Noticia not found');
        }

        $noticia->delete();

        return $this->sendResponse($id, 'Noticia deleted successfully');
    }
}
