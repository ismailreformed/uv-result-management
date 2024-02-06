<div>
    <section >
        <div class="max-w-screen-xl">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="px-2 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        @foreach($tabs as $tab)
                            <li
                                class="me-2"
                            >
                                <a
                                    wire:click="changeTab('{{ $tab }}')"
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg {{ $activeTab !== $tab ? 'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' : 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500' }}"
                                >
                                    {{ $tab }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>


                @if($activeTab === 'Individual Result')
                    <div class="overflow-x-auto">
                        <div class="border-b border-gray-200 mb-4">
                            <div class="grid grid-cols-5 gap-4 px-6 py-4 justify-center items-end">
                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Department</h5>
                                    <select
                                        wire:model.live.debounce.50ms="department_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->name }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="grid-cols-3">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Student</h5>
                                    <livewire:student.student-autocomplete :selectedStudent="$selectedStudent ?? null" />
                                    @error('student_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Semester</h5>
                                    <select
                                        wire:model.live.debounce.50ms="semester_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Semester</option>
                                        @foreach($semesters as $item)
                                            <option
                                                value="{{ $item->id }}"
                                            >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('semester_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Exam</h5>
                                    <select
                                        wire:model.live.debounce.50ms="exam_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Exam</option>
                                        @foreach($exams as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('exam_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid-cols-1">
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg justify-center items-end"
                                        wire:click="searchResult"
                                    >
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>

                        <x-html-print>
                            <div class="m-7" id="printIndividualResult" style=" min-height: 100vh; display: flex; flex-direction: column;">
                                <div class="flex justify-center">
                                    <div class="grid grid-cols-1 gap-0 ">
                                        <!-- School Header Starts-->
                                        <div id="schoolHeader" class="flex justify-center items-center px-3 gap-4 mb-5">
                                            <div class="grid grid-rows-auto gap-0 py-2 text-center items-center rounded ">
                                                <img class="mx-auto" width="150" height="170" src="{{ asset('images/logo.png') }}" alt="logo">
                                                <span class="text-xl font-black uppercase">
                                                    CHITTAGONG UNIVERSITY OF ENGINEERING & TECHNOLOGY
                                                </span>
                                                <span class="text-md font-semibold uppercase text-gray-700">
                                                    (ERSTWHILE BANGLADESH INSTITUTE OF TECHNOLOGY, CHITTAGONG.)
                                                </span>
                                                <span class="text-md font-semibold uppercase text-gray-900">
                                                    CHATTOGRAM-4349, BANGLADESH
                                                </span>
                                                <span class="text-lg font-bold underline my-2">Grade Sheet</span>
                                                <span class="text-lg font-bold">
                                                    {{ $semester ? $semester['name'] : '' }} {{ $department_name }} Degree
                                                </span>
                                            </div>
                                            <br>
                                        </div>
                                        <!-- School Header Ends-->

                                        <div id="studentProfile" class="px-3 justify-end items-end">
                                            <p class="mb-4">
                                                <span class="font-semibold">Name : </span>{{ $student ? $student['name'] : '' }}
                                            </p>

                                            <div class="flex justify-between mb-6">
                                                <p> <span class="font-semibold">Student ID : </span>{{ $student ? $student['roll'] : '' }}</p>
                                                <p> <span class="font-semibold">Date of Enrollment : </span></p>
                                            </div>
                                        </div>

                                        <!-- Academic Record Starts-->
                                        <div id="academicRecord" class="grid px-3 pt-2 gap-0 min-h-[380px]">
                                            <!-- Subject Scores Starts -->
                                            <table class="table-fixed text-center">
                                                <thead>
                                                    <tr class="font-semibold text-md">
                                                        <th class="px-2 py-1 border border-slate-400 text-left w-100 uppercase">Descriptive Title of the Courses</th>
                                                        <th class="border border-slate-400 w-36">Course Number</th>
                                                        <th class="border border-slate-400 w-32">Credit Hours</th>
                                                        <th class="border border-slate-400 w-24">Grade</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($results as $result)
                                                        <tr>
                                                            <td class="border border-slate-400 text-sm text-left px-2 py-0.5"><span>{{ $result['subject_name'] }}</span></td>
                                                            <td class="border border-slate-400 text-sm text-left pl-3 py-0.5"><span>{{ $result['subject_code'] }}</span></td>
                                                            <td class="border border-slate-400 text-sm text-center py-0.5"><span>{{ $result['credit_hours'] }}</span></td>
                                                            <td class="border border-slate-400 text-sm text-left py-0.5 pl-14"><span>{{ $result['grade_letter'] }}</span></td>
                                                        </tr>
                                                    @endforeach
                                                    @if($gpa)
                                                        <tr>
                                                            <td class="text-right text-md font-semibold"></td>
                                                            <td class="text-right text-md font-semibold"></td>
                                                            <td class="text-right text-md font-semibold"></td>
                                                            <td class="text-center text-md font-semibold ">GPA = {{$gpa}}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <!-- Subject Scores Starts -->

                                            <br>
                                        </div>
                                        <!-- Academic Record Ends-->

                                        <div id="footerItem" style="margin-top: auto;">
                                            <!-- Non-Academic Record Starts-->
                                            <div class="grid grid-cols-1 px-3 py-0 gap-1 justify-start">
                                                <!-- Score Guide Starts -->
                                                <span class="text-sm">
                                                     <span class="font-semibold text-sm">Grade Point:</span>
                                                     @foreach($grades as $grade)
                                                         @if(!empty($grade->grade_point))
                                                            <span>{{$grade->grade_letter}}</span> = <span>{{ number_format((float) $grade->grade_point, 2)}}</span>,
                                                         @elseif($grade->grade_letter == 'F')
                                                            <span>{{$grade->grade_letter}}</span> = <span>{{ number_format((float) $grade->grade_point, 2)}}</span>,
                                                         @elseif($grade->grade_letter == 'S' || $grade->grade_letter == 'W')
                                                            <span>{{$grade->grade_letter}}</span> = <span>{{ $grade->title}}</span>,
                                                         @endif
                                                     @endforeach
                                                </span>
                                                <!-- Score Guide Ends -->
                                            </div>
                                            <!-- Non-Academic Record Ends-->

                                            <!-- Remarks Starts -->
                                            <div id="remarks" class="px-3 justify-end items-end">
                                                <div class="my-10 font-semibold">
                                                    <p class="mb-10">Prepared by:</p>
                                                    <p class="">Compared by:</p>
                                                </div>

                                                <div class="flex justify-between">
                                                    <h2 class="font-semibold">Date: {{ \Carbon\Carbon::now()->format('F d, Y')}}.</h2>
                                                    <h2 class="font-semibold uppercase">Controller of the Examinations</h2>
                                                </div>
                                            </div>
                                            <!-- Remarks Ends -->
                                        </div>
                                </div>
                                </div>
                            </div>
                        </x-html-print>

                        <br>
                    </div>

                @elseif($activeTab === 'Combined Result')
                    <div class="overflow-x-auto">
                        <div class="border-b border-gray-200 mb-4">
                            <div class="grid grid-cols-5 gap-4 px-6 py-4 justify-center items-end">
                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Department</h5>
                                    <select
                                        wire:model.live.debounce.50ms="department_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->name }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Semester</h5>
                                    <select
                                        wire:model.live.debounce.50ms="semester_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Semester</option>
                                        @foreach($semesters as $item)
                                            <option
                                                value="{{ $item->id }}"
                                            >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('semester_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Exam</h5>
                                    <select
                                        wire:model.live.debounce.50ms="exam_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Exam</option>
                                        @foreach($exams as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('exam_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid-cols-1">
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg justify-center items-end"
                                        wire:click="searchResult"
                                    >
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>

                        <x-html-print>
                            <div class="m-7" id="printIndividualResult" style=" min-height: 100vh; display: flex; flex-direction: column;">
                                <div class="flex justify-center">
                                    <div class="grid grid-cols-1 gap-0 ">
                                        <!-- School Header Starts-->
                                        <div id="schoolHeader" class="flex justify-around items-center px-3 gap-2">
                                            <div class="grid grid-rows-auto gap-0 py-1 text-center rounded ">
                                                <span class="text-lg font-semibold uppercase">
                                                    CHITTAGONG UNIVERSITY OF ENGINEERING & TECHNOLOGY
                                                </span>
                                                <span class="text-sm font-semibold">
                                                    Dept. of {{ $department_name }} <br>
                                                </span>
                                                <span class="text-sm font-semibold">
                                                    {{ $semester ? $semester['name'] : '' }} <br>
                                                </span>
                                                <span class="text-md font-bold uppercase">Combined Grade Sheet</span>
                                            </div>
                                        </div>
                                        <!-- School Header Ends-->

                                        <!-- Academic Record Starts-->
                                        <div id="academicRecord" class="grid px-3 pt-2 gap-0">
                                            <!-- Subject Scores Starts -->
                                            <table class="table-fixed text-center">
                                                <thead>
                                                <tr class="font-semibold">
                                                    <th rowspan="2" class="px-2 py-1 border border-slate-400 text-sm text-left w-10">SL</th>
                                                    <th rowspan="2" class="border border-slate-400 text-sm w-28">Student ID</th>
                                                    <th rowspan="2" class="border border-slate-400 text-left pl-2 text-sm w-44">Student Name</th>
                                                    <th rowspan="2" class="border border-slate-400 text-sm w-24">Credit Earned</th>
                                                    <th rowspan="2" class="border border-slate-400 text-sm w-20">G.P Earned</th>
                                                    <th rowspan="2" class="border border-slate-400 text-sm w-12">GPA</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($results as $result)
                                                    <tr>
                                                        <td class="border border-slate-400 text-sm text-left px-2 py-0.5"><span>{{ $result['subject_name'] }}</span></td>
                                                        <td class="border border-slate-400 text-sm text-left pl-3 py-0.5"><span>{{ $result['subject_code'] }}</span></td>
                                                        <td class="border border-slate-400 text-sm text-center py-0.5"><span>{{ $result['credit_hours'] }}</span></td>
                                                        <td class="border border-slate-400 text-sm text-left py-0.5 pl-14"><span>{{ $result['grade_letter'] }}</span></td>
                                                    </tr>
                                                @endforeach
                                                @if($gpa)
                                                    <tr>
                                                        <td class="text-right text-md font-semibold"></td>
                                                        <td class="text-right text-md font-semibold"></td>
                                                        <td class="text-right text-md font-semibold"></td>
                                                        <td class="text-center text-md font-semibold ">GPA = {{$gpa}}</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                            <!-- Subject Scores Starts -->

                                            <br>
                                        </div>
                                        <!-- Academic Record Ends-->

                                        <div id="footerItem" style="margin-top: auto;">
                                            <!-- Remarks Starts -->
                                            <div id="remarks" class="px-3 justify-end items-end">
                                                <div class="my-6">
                                                    <p class="mb-6">Prepared by:</p>
                                                    <p class="">Compared by:</p>
                                                </div>

                                                <div class="flex justify-between">
                                                    <h2 class="font-semibold">Date:</h2>
                                                    <h2 class="font-semibold uppercase">Controller of the Examinations</h2>
                                                </div>
                                            </div>
                                            <!-- Remarks Ends -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-html-print>

                        <br>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
