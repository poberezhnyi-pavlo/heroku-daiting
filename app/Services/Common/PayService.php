<?php

namespace App\Services\Common;

use App\Models\Gift;
use App\Models\Man;
use App\Repositories\Admin\SettingRepository;
use App\Services\BaseService;

class PayService extends BaseService
{
    private SettingRepository $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function payMessage(Man $man, string $message): void
    {
        $price = $this->getPriceMessage($message);

        $sum = $man->credits - $price;
        $man->credits = $sum;
        $man->save();
    }

    private function getPriceMessage(string $message): float
    {
        $countSymbol = str_word_count($message);

        if (in_array($countSymbol, range(0, 100), true)) {
            return (float)$this->settingRepository->getById(2)->value;
        }

        if (in_array($countSymbol, range(101, 300), true)) {
            return (float)$this->settingRepository->getById(3)->value;
        }

        if ($countSymbol > 300) {
            return (float)$this->settingRepository->getById(4)->value;
        }

        return 0;
    }

    public function payGift(Man $man, Gift $gift): void
    {
        $sum = $man->credits - $gift->price;
        $man->credits = $sum;
        $man->save();
    }

    public function canPayMessage(Man $man, string $message): bool
    {
        $price = $this->getPriceMessage($message);

        return $man->credits > $price;
    }

    public function canPayGift(Man $man, Gift $gift): bool
    {
        return $man->credits > $gift->price;
    }
}
