<?php

namespace App\Presenters;

use App\Contracts\Presenter;

trait UserPresenter
{
    use Presenter;

    public function getAvatarUrl()
    {
        return !$this->avatar
        ? '/assets/media/users/blank.png'
        : (
            (\FileManager::getFileSystem() == 'public')
            ? sprintf('%s/%s', '/storage/pos/usuarios/avatar', $this->avatar)
            : \Storage::disk(\FileManager::getFileSystem())->url(sprintf('%s/%s', 'usuarios/avatar', $this->avatar))
        );
    }
}