<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nombre', // Nuevo campo
        'telefono', // Nuevo campo
        'direccion', // Nuevo campo
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Mutador para encriptar el email antes de guardarlo en la base de datos.
     *
     * @param  string  $value
     * @return void
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = encrypt($value);
    }

    /**
     * Accesor para desencriptar el email cuando se accede a él.
     *
     * @param  string  $value
     * @return string
     */
    public function getEmailAttribute($value)
    {
        try {
            return decrypt($value);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            // Manejar el error, por ejemplo, devolver un valor predeterminado
            return 'Correo no disponible';
        }
    }

    /**
     * Mutador para encriptar el teléfono antes de guardarlo en la base de datos.
     *
     * @param  string  $value
     * @return void
     */
    public function setTelefonoAttribute($value)
    {
        $this->attributes['telefono'] = encrypt($value);
    }

    /**
     * Accesor para desencriptar el teléfono cuando se accede a él.
     *
     * @param  string  $value
     * @return string
     */
    public function getTelefonoAttribute($value)
    {
        try {
            $decryptedValue = Crypt::decrypt($value);
            return $decryptedValue;
        } catch (DecryptException $e) {
            // El valor no está cifrado, simplemente devolvemos el valor original
            return $value;
        }
    }
}
