<?php

namespace App\Swagger\Schemas;

/**
 * @OA\Info(
 *     title="API LatinAD Challenge",
 *     version="1.0",
 *     description="Documentación de la API del Challenge de LatinAD",
 *     @OA\Contact(
 *         email="mmrodriguezdev@gmail.com",
 *         name="Martin Rodriguez"
 *     )
 * )
 */

/**
 * @OA\Schema(
 *     schema="Display",
 *     type="object",
 *     required={"name", "description", "price_per_day", "resolution_height", "resolution_width", "type"},
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="price_per_day", type="number", format="float"),
 *     @OA\Property(property="resolution_height", type="integer"),
 *     @OA\Property(property="resolution_width", type="integer"),
 *     @OA\Property(property="type", type="string", enum={"indoor", "outdoor"})
 * )
 */
class DisplaySchemas {
}
