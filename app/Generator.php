<?php
namespace RCG;

use Latte\Engine;

class Generator
{

    private $source;

    public function __construct(string $source)
    {
        $this->source = $source;
    }

    public function generate(string $dir)
    {
        $latte = new Engine();
        $latte->setTempDirectory(__DIR__ . '/temp');

        $data = json_decode(file_get_contents($this->source));
        foreach ((array) $data as $filename => $content) {
            file_put_contents($dir . '/' . $filename . '.php', $latte->renderToString(__DIR__ . '/classFile.latte', [
                'className' => $filename,
                'methods' => $content
            ]));
        }
        file_put_contents($dir . '/Collector.php', $latte->renderToString(__DIR__ . '/collector.latte', [
            'variables' => $this->variables($data)
        ]));
    }

    private function variables($data)
    {
        $result = [];
        foreach ((array) $data as $content) {
            foreach ($content as $method) {
                foreach ((array)$method->data as $attribute => $value) {
                    list($prop) = explode('->', $attribute);
                    $result[$prop] = $prop;
                }
            }
        }
        if (array_key_exists('export', $result)) {
            unset($result['export']);
        }
        return array_values($result);
    }

}

