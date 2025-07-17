<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $Description
 * @property int $Surface
 * @property int $price
 * @property int $Sold
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $quartier_id
 * @property int $type_bien_id
 * @property int $type_vente_id
 * @property-read \App\Models\Quartier|null $quartier
 * @property-read \App\Models\Type_bien|null $type_bien
 * @property-read \App\Models\Type_vente|null $type_vente
 * @method static \Illuminate\Database\Eloquent\Builder|Bien newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bien newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bien query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereQuartierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereSurface($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereTypeBienId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereTypeVenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bien whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBien {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bien> $bien
 * @property-read int|null $bien_count
 * @method static \Illuminate\Database\Eloquent\Builder|Quartier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quartier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quartier query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quartier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quartier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quartier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quartier whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperQuartier {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bien> $bien
 * @property-read int|null $bien_count
 * @method static \Illuminate\Database\Eloquent\Builder|Type_bien newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type_bien newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type_bien query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type_bien whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type_bien whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type_bien whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type_bien whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperType_bien {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bien> $bien
 * @property-read int|null $bien_count
 * @method static \Illuminate\Database\Eloquent\Builder|Type_vente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type_vente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type_vente query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type_vente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type_vente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type_vente whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type_vente whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperType_vente {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

