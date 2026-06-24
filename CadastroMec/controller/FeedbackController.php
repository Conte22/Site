<?php

class FeedbackController
{
    private $apiUrl;

    public function __construct()
    {
        $envPath = __DIR__ . '/../.env';

        if (file_exists($envPath)) {
            $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                $line = trim($line);

                if ($line === '' || strpos($line, '#') === 0 || strpos($line, '=') === false) {
                    continue;
                }

                [$name, $value] = explode('=', $line, 2);
                $_ENV[trim($name)] = trim($value);
            }
        }

        $this->apiUrl = $_ENV['MOCKAPI_URL'] ?? '';
    }

    public function listar()
    {
        if (empty($this->apiUrl)) {
            return [];
        }

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true) ?: [];
    }

    public function salvar()
    {
        if (empty($this->apiUrl)) {
            return;
        }

        $ch = curl_init($this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            'nome' => $_POST['nome'],
            'feedback' => $_POST['feedback'],
        ]));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_exec($ch);
        curl_close($ch);

        header('Location: feedbacks_mural.php?status=sucesso');
        exit;
    }
}
