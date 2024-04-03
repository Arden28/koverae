<div>
    @section('styles')
    <style>
        .calculator {
            width: 300px;
            margin: auto;
            text-align: center;
        }

        .calculator .display {
            background-color: #f1f1f1;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 20px;
            text-align: start;
        }

        .calculator .display .current{
            font-size: 24px;
        }

        .calculator .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 5px;
        }

        .buttons button {
            background-color: black;
            color: white;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ffffff;
        }
        .buttons #primary{
            background-color: #0E6163;
        }
        .buttons #secondary{
            background-color: #b8b8b8;
        }
    </style>
    @endsection
    <!-- Calculator -->

    <div class="calculator">
        <div class="display">
            <p class="current">{{ $result }}</p>
            <p>{{ $currentOperand }}</p>
        </div>

        <div class="buttons">
            <div>
                <button wire:click="updateOperand(1)">1</button>
                <button wire:click="updateOperand(2)">2</button>
                <button wire:click="updateOperand(3)">3</button>
                <button wire:click="updateOperation('+')">+</button>
            </div>

            <div>
                <button wire:click="updateOperand(4)">4</button>
                <button wire:click="updateOperand(5)">5</button>
                <button wire:click="updateOperand(6)">6</button>
                <button wire:click="updateOperation('-')">-</button>
            </div>

            <div>
                <button wire:click="updateOperand(7)">7</button>
                <button wire:click="updateOperand(8)">8</button>
                <button wire:click="updateOperand(9)">9</button>
                <button wire:click="updateOperation('*')">*</button>
            </div>

            <div>
                <button id="secondary" wire:click="updateOperand(0)">0</button>
                <button id="primary" wire:click="calculate">=</button>
                <button id="secondary" wire:click="clear">C</button>
                <button id="secondary" wire:click="updateOperation('/')">/</button>
            </div>

        </div>
</div>
