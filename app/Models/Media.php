<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  // create constant array of allowed mimetypes
  const MIMETYPES = [
    'image/png',
    'image/jpeg',
    'image/gif',
    'image/webp',
  ];

  const RESIZABLE_MIMETYPES = [
    'image/png',
    'image/jpeg',
  ];
}
