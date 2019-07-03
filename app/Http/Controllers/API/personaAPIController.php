<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatepersonaAPIRequest;
use App\Http\Requests\API\UpdatepersonaAPIRequest;
use App\Models\persona;
use App\Repositories\personaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class personaController
 * @package App\Http\Controllers\API
 */

class personaAPIController extends AppBaseController
{
    /** @var  personaRepository */
    private $personaRepository;

    public function __construct(personaRepository $personaRepo)
    {
        $this->personaRepository = $personaRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/personas",
     *      summary="Get a listing of the personas.",
     *      tags={"persona"},
     *      description="Get all personas",
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
     *                  @SWG\Items(ref="#/definitions/persona")
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
        $personas = $this->personaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($personas->toArray(), 'Personas retrieved successfully');
    }

    /**
     * @param CreatepersonaAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/personas",
     *      summary="Store a newly created persona in storage",
     *      tags={"persona"},
     *      description="Store persona",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="persona that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/persona")
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
     *                  ref="#/definitions/persona"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatepersonaAPIRequest $request)
    {
        $input = $request->all();

        $persona = $this->personaRepository->create($input);

        return $this->sendResponse($persona->toArray(), 'Persona saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/personas/{id}",
     *      summary="Display the specified persona",
     *      tags={"persona"},
     *      description="Get persona",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of persona",
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
     *                  ref="#/definitions/persona"
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
        /** @var persona $persona */
        $persona = $this->personaRepository->find($id);

        if (empty($persona)) {
            return $this->sendError('Persona not found');
        }

        return $this->sendResponse($persona->toArray(), 'Persona retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatepersonaAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/personas/{id}",
     *      summary="Update the specified persona in storage",
     *      tags={"persona"},
     *      description="Update persona",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of persona",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="persona that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/persona")
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
     *                  ref="#/definitions/persona"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatepersonaAPIRequest $request)
    {
        $input = $request->all();

        /** @var persona $persona */
        $persona = $this->personaRepository->find($id);

        if (empty($persona)) {
            return $this->sendError('Persona not found');
        }

        $persona = $this->personaRepository->update($input, $id);

        return $this->sendResponse($persona->toArray(), 'persona updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/personas/{id}",
     *      summary="Remove the specified persona from storage",
     *      tags={"persona"},
     *      description="Delete persona",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of persona",
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
        /** @var persona $persona */
        $persona = $this->personaRepository->find($id);

        if (empty($persona)) {
            return $this->sendError('Persona not found');
        }

        $persona->delete();

        return $this->sendResponse($id, 'Persona deleted successfully');
    }
}
