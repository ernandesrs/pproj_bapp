{{--

Este componente é um modal em que é exibido um alerta e exige do usuário uma confirmação para a execução de uma ação.
A alimentação deste modal com o seu tipo, que pode ser 'default', 'danger', 'success', 'info' ou 'warning'; o seu título, o seu texto
personalizado, deve ser feito no botão em que o modal é acionado. Para isso pode-se usar o componente 'common/btn-confirmation', que está
preparado para receber os dados e disparar o evento que acionará este modal. Vide o componente 'common/btn-confirmation' para mais detalhes.

--}}
<div
    x-data="{
        data: {
            // Allows: default, success, danger, warning, info
            type: 'default',
            title: 'Are you sure?',
            text: 'Confirm if you are sure you want to perform this action.',
            action: {
                name: null,
                id: null
            }
        },
        id: null,
        showDialog: false,
        showDialogContent: false,
        confirmationType: 'default',
        lockBackdrop: false,
        actionToOne: false,

        init() {
            $nextTick(() => {
                //
            });
        },

        method_show(event) {
            if (event?.type == 'need_confirmation_with_dialog') {
                this.id = event.detail.id;
                this.actionToOne = event.detail.actionToOne;
                this.data = event.detail.data;
            }

            this.confirmationType = this.data.type;
            this.showDialog = true;

            setTimeout(() => {
                this.showDialogContent = true;
            }, 200);
        },

        method_close() {
            this.id = null;
            this.showDialogContent = false;
            setTimeout(() => {
                this.showDialog = false;
            }, 200);
        },

        method_cancel() {
            this.method_close();
        },

        method_confirm(event) {
            const action = this.data.action;

            if (!action?.name || (this.actionToOne && !action?.id)) {
                throw new Error('Need a action name and a id.');
            }

            this.lockBackdrop = true;
            if (this.actionToOne) {
                $wire.call(action?.name, action?.id).finally(() => {
                    this.lockBackdrop = false;
                    this.method_close();
                });
            } else {
                $wire.call(action?.name).finally(() => {
                    this.lockBackdrop = false;
                    this.method_close();
                });
            }
        },

        method_backdropClick(event) {
            if (event.target == $el && !this.lockBackdrop) {
                this.method_close();
            }
        },

        method_confirmationTypeStyle() {
            switch (this.data.type) {
                case 'success':
                    return '!bg-emerald-500 hover:!bg-emerald-600';
                case 'danger':
                    return '!bg-red-400 hover:!bg-red-500';
                case 'warning':
                    return '!bg-orange-400 hover:!bg-orange-500';
                default:
                    return '!bg-gray-500 hover:!bg-gray-600';
            }
        }
    }"
    class="flex items-center justify-center w-full h-screen bg-gray-900 bg-opacity-75 fixed top-0 left-0"
    style="display: none; z-index:990"
    x-show="showDialog"
    x-transition:enter="duration-200 ease-in-out"
    x-transition:enter-start="bg-opacity-0"

    x-on:need_confirmation_with_dialog.window="method_show"
    x-on:click="method_backdropClick">
    <div
        class="w-full max-w-[525px] bg-slate-300 py-5 px-8 cursor-default rounded-sm"
        style="display: none"
        x-show="showDialogContent"
        x-transition:enter="duration-300 ease-in-out"
        x-transition:enter-start="scale-90"
        x-transition:enter-end="scale-100"
        x-transition:leave="duration-200 ease-out"
        x-transition:leave-start="scale-100"
        x-transition:leave-end="scale-110">
        {{-- title --}}
        <div
            class="text-lg font-medium text-gray-700"
            x-text="data.title"></div>

        {{-- message --}}
        <div
            class="mt-2 mb-5 text-gray-600"
            x-text="data.text"></div>

        {{-- buttons --}}
        <div class="flex items-center justify-end gap-x-2">
            <x-common.clickable
                class="!bg-gray-100 hover:!bg-gray-200 text-sm"
                label="Cancel"
                prepend-icon="x-circle"
                x-on:click="method_cancel"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-25" />

            <x-common.clickable
                label="Confirm"
                prepend-icon="check-circle"
                class="text-sm text-gray-100 !bg-gray-500 hover:!bg-gray-600"
                x-show="confirmationType == 'default'"
                x-on:click="method_confirm"
                wire:loading.attr="disabled"
                wire:loading.class="animate-pulse" />

            <x-common.clickable
                label="Confirm"
                prepend-icon="check-circle"
                class="text-sm text-gray-100 !bg-emerald-500 hover:!bg-emerald-600"
                x-show="confirmationType == 'success'"
                x-on:click="method_confirm"
                wire:loading.attr="disabled"
                wire:loading.class="animate-pulse" />

            <x-common.clickable
                label="Confirm"
                prepend-icon="check-circle"
                class="text-sm text-gray-100 hover:!text-gray-200 !bg-red-400 hover:!bg-red-500"
                x-show="confirmationType == 'danger'"
                x-on:click="method_confirm"
                wire:loading.attr="disabled"
                wire:loading.class="animate-pulse" />

            <x-common.clickable
                label="Confirm"
                prepend-icon="check-circle"
                class="text-sm text-gray-100 hover:!text-gray-200 !bg-orange-400 hover:!bg-orange-500"
                x-show="confirmationType == 'warning'"
                x-on:click="method_confirm"
                wire:loading.attr="disabled"
                wire:loading.class="animate-pulse" />

            <x-common.clickable
                label="Confirm"
                prepend-icon="check-circle"
                class="text-sm text-gray-100 hover:!text-gray-200 !bg-sky-500 hover:!bg-sky-600"
                x-show="confirmationType == 'info'"
                x-on:click="method_confirm"
                wire:loading.attr="disabled"
                wire:loading.class="animate-pulse" />
        </div>
    </div>
</div>
