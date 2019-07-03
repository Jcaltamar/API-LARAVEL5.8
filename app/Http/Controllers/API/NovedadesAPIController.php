<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNovedadesAPIRequest;
use App\Http\Requests\API\UpdateNovedadesAPIRequest;
use App\Models\Novedades;
use App\Repositories\NovedadesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NovedadesController
 * @package App\Http\Controllers\API
 */

class NovedadesAPIController extends AppBaseController
{
    /** @var  NovedadesRepository */
    private $novedadesRepository;

    public function __construct(NovedadesRepository $novedadesRepo)
    {
        $this->novedadesRepository = $novedadesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/novedades",
     *      summary="Get a listing of the Novedades.",
     *      tags={"Novedades"},
     *      description="Get all Novedades",
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
     *                  @SWG\Items(ref="#/definitions/Novedades")
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
        $novedades = $this->novedadesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($novedades->toArray(), 'Novedades retrieved successfully');
    }

    /**
     * @param CreateNovedadesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/novedades",
     *      summary="Store a newly created Novedades in storage",
     *      tags={"Novedades"},
     *      description="Store Novedades",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Novedades that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Novedades")
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
     *                  ref="#/definitions/Novedades"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateNovedadesAPIRequest $request)
    {
        $input = $request->all();

        $novedades = $this->novedadesRepository->create($input);

        return $this->sendResponse($novedades->toArray(), 'Novedades saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/novedades/{id}",
     *      summary="Display the specified Novedades",
     *      tags={"Novedades"},
     *      description="Get Novedades",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Novedades",
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
     *                  ref="#/definitions/Novedades"
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
        /** @var Novedades $novedades */
        $novedades = $this->novedadesRepository->find($id);

        if (empty($novedades)) {
            return $this->sendError('Novedades not found');
        }

        return $this->sendResponse($novedades->toArray(), 'Novedades retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateNovedadesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/novedades/{id}",
     *      summary="Update the specified Novedades in storage",
     *      tags={"Novedades"},
     *      description="Update Novedades",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Novedades",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="Novedades that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/Novedades")
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
     *                  ref="#/definitions/Novedades"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateNovedadesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Novedades $novedades */
        $novedades = $this->novedadesRepository->find($id);

        if (empty($novedades)) {
            return $this->sendError('Novedades not found');
        }

        $novedades = $this->novedadesRepository->update($input, $id);

        return $this->sendResponse($novedades->toArray(), 'Novedades updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/novedades/{id}",
     *      summary="Remove the specified Novedades from storage",
     *      tags={"Novedades"},
     *      description="Delete Novedades",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of Novedades",
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
        /** @var Novedades $novedades */
        $novedades = $this->novedadesRepository->find($id);

        if (empty($novedades)) {
            return $this->sendError('Novedades not found');
        }

        $novedades->delete();

        return $this->sendResponse($id, 'Novedades deleted successfully');
    }
}
