<?php

use Latte\Runtime as LR;

/** source: C:\www\rps/classFile.latte */
final class Template5604380621 extends Latte\Runtime\Template
{

	public function main(): array
	{
		extract($this->params);
		echo '<?php
namespace App\\Collector;

class ';
		echo LR\Filters::escapeHtml($className) /* line 4 */;
		echo ' extends Collector
{

';
		$iterations = 0;
		foreach ($methods as $method) /* line 7 */ {
			echo '    /**
';
			if ($method->param) /* line 9 */ {
				echo '     * @param $';
				echo LR\Filters::escapeHtml($method->param) /* line 9 */;
			}
			echo '
     * @return ';
			echo LR\Filters::escapeHtml($method->return) /* line 10 */;
			echo '
     */
    public function ';
			echo LR\Filters::escapeHtml($method->name) /* line 12 */;
			echo '(';
			echo LR\Filters::escapeHtml($method->param ? '$' . $method->param : null) /* line 12 */;
			echo '): ';
			echo LR\Filters::escapeHtml($method->return) /* line 12 */;
			echo '
    {
';
			$iterations = 0;
			foreach ($method->data as $target => $source) /* line 14 */ {
				echo '        self::$';
				echo $target /* line 15 */;
				echo ' = ';
				echo $source /* line 15 */;
				echo ';
';
				$iterations++;
			}
			echo '        return new ';
			echo LR\Filters::escapeHtml($method->return) /* line 17 */;
			echo ';
    }


';
			$iterations++;
		}
		echo '}';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['target' => '14', 'source' => '14', 'method' => '7'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		
	}

}
