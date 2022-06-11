@props(['trigger'])
<div x-data="{ show:false }" @click.away="show = false">
    <div @click="show = ! show">
        {{ $trigger }}
    </div>
    <div x-show="show"
         class="py-2 absolute bg-gray-100 w-full  lg:w-72 mt-2 rounded-xl z-10 overflow-auto max-h-52 border border-gray-300"
         style="display: none;">
        {{$slot}}
    </div>
</div>
