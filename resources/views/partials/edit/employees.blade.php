{{-- This partial serves as a button to edit employees with ajax --}}
<input type="hidden" value="{{ $employee->slug }}" name="employeeslug" id="employeeslug" />

<input type="hidden" value="{{ $agent->slug }}" name="agentslug" id="agentslug" />

<button id="" type="submit" class="edit btn btn-xs btn-white">{{ $submitTextButton }}</button>
