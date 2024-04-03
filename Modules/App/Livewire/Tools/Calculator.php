<?php

namespace Modules\App\Livewire\Tools;

use Livewire\Component;

class Calculator extends Component
{
    public $result = 0;
    public $currentOperand = '';
    public $previousOperand = '';
    public $sign = '';
    public $display = '';
    public $operator = '';
    public $clearOnNextInput = false;
    public $operationJustPerformed = false;

    // Configurable options
    public $buttons = [
        '1', '2', '3', '+',
        '4', '5', '6', '-',
        '7', '8', '9', '*',
        '0', '=', 'C', '/',
    ];

    public $buttonColors = [
        '1' => 'primary', '2' => 'primary', '3' => 'primary', '+' => 'success',
        '4' => 'primary', '5' => 'primary', '6' => 'primary', '-' => 'success',
        '7' => 'primary', '8' => 'primary', '9' => 'primary', '*' => 'success',
        '0' => 'primary', '=' => 'info', 'C' => 'danger', '/' => 'success',
    ];
    public function updateOperand($value)
    {
        if ($this->operationJustPerformed) {
            $this->currentOperand = '';
            $this->operationJustPerformed = false;
        }

        if ($value === 'C') {
            $this->clear();
        } elseif ($value === '=') {
            $this->calculate();
        } else {
            // Check if the current input is numeric or an operator
            if (is_numeric($value) || $value === '.') {
                $this->currentOperand .= $value;
            } else {
                $this->applyOperator($value);
            }

            $this->clearOnNextInput = false;
        }
    }
    public function applyOperator($operator)
    {
        // If there's an existing operator, perform the calculation
        if ($this->operator !== '' && $this->currentOperand !== '') {
            $this->calculate();
        }

        // Set the new operator
        $this->operator = $operator;

        // If the current operand is not empty, update the result
        if ($this->currentOperand !== '') {
            $this->result = (float)$this->currentOperand;
            $this->currentOperand = '';
        }
    }

    public function updateOperation($operation)
    {
        $this->operator = $operation;
        $this->result = (float)$this->currentOperand;
        $this->currentOperand = '';
        $this->clearOnNextInput = false;
    }
    public function performOperation($operator)
    {
        $this->calculate();

        $this->operator = $operator;
        $this->currentOperand = '';
        $this->result = (float)$this->currentOperand;
        $this->operationJustPerformed = true;
    }

    public function calculate()
    {
        if ($this->operator && is_numeric($this->previousOperand) && is_numeric($this->currentOperand)) {
            switch ($this->operator) {
                case '+':
                    $result = $this->previousOperand + $this->currentOperand;
                    break;
                case '-':
                    $result = $this->previousOperand - $this->currentOperand;
                    break;
                case '*':
                    $result = $this->previousOperand * $this->currentOperand;
                    break;
                case '/':
                    $result = $this->previousOperand / $this->currentOperand;
                    break;
                default:
                    $result = $this->currentOperand;
            }

            // Set the sign to be displayed
            $this->sign = $this->operator;

            // Display the result
            $this->display = $result;

            // Save the result for the next operation
            $this->previousOperand = $result;
            $this->currentOperand = '';
            $this->clearOnNextInput = true;
            $this->operationJustPerformed = true;
        }

        $this->result = eval("return {$this->result} {$this->operator} {$this->currentOperand};");
        $this->currentOperand = '';
        $this->operator = '';
        $this->clearOnNextInput = true;
    }

    public function clear()
    {
        $this->result = 0;
        $this->currentOperand = '';
        $this->operator = '';
        $this->clearOnNextInput = false;
    }
    public function render()
    {
        return view('app::livewire.tools.calculator');
    }
}
