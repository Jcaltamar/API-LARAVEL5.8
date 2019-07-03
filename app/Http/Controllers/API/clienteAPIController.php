<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateclienteAPIRequest;
use App\Http\Requests\API\UpdateclienteAPIRequest;
use App\Models\cliente;
use App\Repositories\clienteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class clienteController
 * @package App\Http\Controllers\API
 */

class clienteAPIController extends AppBaseController
{
    /** @var  clienteRepository */
    private $clienteRepository;

    public function __construct(clienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/clientes",
     *      summary="Get a listing of the clientes.",
     *      tags={"cliente"},
     *      description="Get all clientes",
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
     *                  @SWG\Items(ref="#/definitions/cliente")
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
        $clientes = $this->clienteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientes->toArray(), 'Clientes retrieved successfully');
    }

    /**
     * @param CreateclienteAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/clientes",
     *      summary="Store a newly created cliente in storage",
     *      tags={"cliente"},
     *      description="Store cliente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="cliente that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/cliente")
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
     *                  ref="#/definitions/cliente"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateclienteAPIRequest $request)
    {
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        return $this->sendResponse($cliente->toArray(), 'Cliente saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/clientes/{id}",
     *      summary="Display the specified cliente",
     *      tags={"cliente"},
     *      description="Get cliente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of cliente",
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
     *                  ref="#/definitions/cliente"
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
        /** @var cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        return $this->sendResponse($cliente->toArray(), 'Cliente retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateclienteAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/clientes/{id}",
     *      summary="Update the specified cliente in storage",
     *      tags={"cliente"},
     *      description="Update cliente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of cliente",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="cliente that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/cliente")
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
     *                  ref="#/definitions/cliente"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateclienteAPIRequest $request)
    {
        $input = $request->all();

        /** @var cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        $cliente = $this->clienteRepository->update($input, $id);

        return $this->sendResponse($cliente->toArray(), 'cliente updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/clientes/{id}",
     *      summary="Remove the specified cliente from storage",
     *      tags={"cliente"},
     *      description="Delete cliente",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of cliente",
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
        /** @var cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        $cliente->delete();

        return $this->sendResponse($id, 'Cliente deleted successfully');
    }
}
