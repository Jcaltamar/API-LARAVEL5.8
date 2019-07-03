<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatemensajeAPIRequest;
use App\Http\Requests\API\UpdatemensajeAPIRequest;
use App\Models\mensaje;
use App\Repositories\mensajeRepository;
use Berkayk\OneSignal\OneSignalClient;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use OneSignal;

/**
 * Class mensajeController
 * @package App\Http\Controllers\API
 */

class mensajeAPIController extends AppBaseController
{
    /** @var  mensajeRepository */
    private $mensajeRepository;

    public function __construct(mensajeRepository $mensajeRepo)
    {
        $this->mensajeRepository = $mensajeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/mensajes",
     *      summary="Get a listing of the mensajes.",
     *      tags={"mensaje"},
     *      description="Get all mensajes",
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
     *                  @SWG\Items(ref="#/definitions/mensaje")
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
        $mensajes = $this->mensajeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($mensajes->toArray(), 'Mensajes retrieved successfully');
    }

    /**
     * @param CreatemensajeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/mensajes",
     *      summary="Store a newly created mensaje in storage",
     *      tags={"mensaje"},
     *      description="Store mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="mensaje that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/mensaje")
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
     *                  ref="#/definitions/mensaje"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatemensajeAPIRequest $request)
    {
        $input = $request->all();
	
        $mensaje = $this->mensajeRepository->create($input);

        OneSignal::sendNotificationToAll(
            $request->mensaje,
            $url = $request->url,
            $data =null,
            $buttons = null,
            $schedule = null
        );


        return $this->sendResponse($mensaje->toArray(), 'Mensaje saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/mensajes/{id}",
     *      summary="Display the specified mensaje",
     *      tags={"mensaje"},
     *      description="Get mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of mensaje",
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
     *                  ref="#/definitions/mensaje"
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
        /** @var mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        return $this->sendResponse($mensaje->toArray(), 'Mensaje retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatemensajeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/mensajes/{id}",
     *      summary="Update the specified mensaje in storage",
     *      tags={"mensaje"},
     *      description="Update mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of mensaje",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="mensaje that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/mensaje")
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
     *                  ref="#/definitions/mensaje"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatemensajeAPIRequest $request)
    {
        $input = $request->all();

        /** @var mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje = $this->mensajeRepository->update($input, $id);

        return $this->sendResponse($mensaje->toArray(), 'mensaje updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/mensajes/{id}",
     *      summary="Remove the specified mensaje from storage",
     *      tags={"mensaje"},
     *      description="Delete mensaje",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of mensaje",
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
        /** @var mensaje $mensaje */
        $mensaje = $this->mensajeRepository->find($id);

        if (empty($mensaje)) {
            return $this->sendError('Mensaje not found');
        }

        $mensaje->delete();

        return $this->sendResponse($id, 'Mensaje deleted successfully');
    }
}
