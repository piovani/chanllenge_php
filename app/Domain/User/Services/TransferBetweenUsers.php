<?php

namespace App\Domain\User\Services;

use App\Domain\User\User;

class TransferBetweenUsers
{
    public function __invoke(array $data): array
    {
        $payer = $this->getUser($data['payer']);
        $payee = $this->getUser($data['payee']);
        $value = $data['value'];

        if (!$this->validateTypePayer($payer)) {
            return [false, 'Tipo do pagaddor inválido'];
        }

        if (!$this->validateValueInWallet($payer, $value)) {
            return [false, 'Valor insuficiente na conta '];
        }

        $this->addValueInWallet($payee, $value);
        $this->subValueInWallet($payer, $value);

        return [true, 'Operação realizada com sucesso'];
    }

    private function getUser(string $id)
    {
        return User::find($id);
    }

    private function validateTypePayer(User $user): bool
    {
        return $user->readablePayment();
    }

    private function validateValueInWallet(User $user, float $value): bool
    {
        return $user->hasValueInWallet($value);
    }

    private function addValueInWallet(User $user, float $value): void
    {
        $user->addValueWallet($value);
    }

    private function subValueInWallet(User $user, float $value): void
    {
        $user->subValueWallet($value);
    }
}
