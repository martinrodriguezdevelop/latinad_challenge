<?php

namespace App\Swagger;

/**
 *
 *
 * @OA\Post(
 *     path="/api/login",
 *     summary="Login de usuario",
 *     tags={"Autenticación"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="usuario@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login exitoso. Devuelve el token de acceso.",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="1|ABC123..."),
 *             @OA\Property(property="token_type", type="string", example="Bearer")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Credenciales inválidas",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Credenciales inválidas")
 *         )
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/displays",
 *     summary="Listar displays",
 *     tags={"Displays"},
 *     @OA\Response(
 *         response=200,
 *         description="Lista de displays"
 *     )
 * )
 *
 * @OA\Get(
 *     path="/api/displays/{id}",
 *     summary="Mostrar un display",
 *     tags={"Displays"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Información del display",
 *         @OA\JsonContent(ref="#/components/schemas/Display")
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="This action is unauthorized..")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Display no encontrado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Resource not found.")
 *         )
 *     )
 * )
 * @OA\Post(
 *     path="/api/displays",
 *     summary="Crear display",
 *     tags={"Displays"},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Display")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Display creado",
 *         @OA\JsonContent(ref="#/components/schemas/Display")
 *     )
 * )
 *
 * @OA\Put(
 *     path="/api/displays/{id}",
 *     summary="Actualizar un display",
 *     tags={"Displays"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(ref="#/components/schemas/Display")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Display actualizado",
 *         @OA\JsonContent(ref="#/components/schemas/Display")
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="This action is unauthorized..")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Display no encontrado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Resource not found.")
 *         )
 *     )
 * )
 *
 * @OA\Delete(
 *     path="/api/displays/{id}",
 *     summary="Eliminar un display",
 *     tags={"Displays"},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Display eliminado"
 *     ),
 *     @OA\Response(
 *         response=403,
 *         description="Unauthorized",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="This action is unauthorized..")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Display no encontrado",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Resource not found.")
 *         )
 *     )
 * )
 */
class DisplayControllerDocs {
}
