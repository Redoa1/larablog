@props(['name'])
<x-form.field>
    
    <x-form.label name='{{ $name }}' />
        <textarea
        class="
          form-control
          block
          w-full
          px-3
          py-1.5
          text-base
          font-normal
          text-gray-700
          bg-white bg-clip-padding
          border border-solid border-gray-300
          rounded
          transition
          ease-in-out
          m-0
          focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
        "
        id="exampleFormControlTexcerpt"
        name="{{$name}}"
        rows="3"
        value="{{ old($name) }}"
        placeholder="Yourexcerpt"
      required></textarea>
      <x-form.error name='{{ $name }}' />
</x-form.field>
