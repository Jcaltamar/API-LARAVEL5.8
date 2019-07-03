<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNoticiaAPIRequest;
use App\Http\Requests\API\UpdateNoticiaAPIRequest;
use App\Models\Noticia;
use App\Repositories\NoticiaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NoticiaController
 * @package App\Http\Controllers\API
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
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/noticias",
     *      summary="Get a listing of the Noticias.",
     *      tags={"Noticia"},
     *      description="Get all Noticias",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/Noticia")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
     * @param CreateNoticiaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/noticias",
     *      summary="Store a newly created Noticia in storage",
     *      tags={"Noticia"},
     *      description="Store Noticia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Noticia that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Noticia")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Noticia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateNoticiaAPIRequest $request)
    {
        $input = $request->all();

        $noticia = $this->noticiaRepository->create($input);

        return $this->sendResponse($noticia->toArray(), 'Noticia saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/noticias/{id}",
     *      summary="Display the specified Noticia",
     *      tags={"Noticia"},
     *      description="Get Noticia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Noticia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Noticia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
     * @param int $id
     * @param UpdateNoticiaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/noticias/{id}",
     *      summary="Update the specified Noticia in storage",
     *      tags={"Noticia"},
     *      description="Update Noticia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Noticia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Noticia that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Noticia")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/Noticia"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/noticias/{id}",
     *      summary="Remove the specified Noticia from storage",
     *      tags={"Noticia"},
     *      description="Delete Noticia",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Noticia",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
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
