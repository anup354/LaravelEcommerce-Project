<div class="flex flex-col w-64">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
        <div class="mt-2 flex-grow flex flex-col pl-4">
            <div class="flex-1 px-2 bg-white space-y-1">
                <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
                <a href="{{ route('portal.dashboard') }}"
                    class=" text-gray-600 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    Dashboard
                </a>

                <a href="{{ route('user.profile') }}"
                    class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    Profile
                </a>

                <a href="{{ route('user.passwordChange') }}"
                    class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    Change Password

                </a>

                <a href="{{ route('user.history') }}"
                    class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                    Order History
                </a>

                <a href="{{ route('user.statements') }}"
                    class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                    Payment Statements
                </a>

                <a href="{{ route('user.tracker') }}"
                    class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">

                    Track Order
                </a>
                @if (Auth::guard('softsaro__users')->user()->is_affilate == '1' &&
                        Auth::guard('softsaro__users')->user()->status == 'VERIFIED')
                <a href="{{ route('user.tracker') }}"
                    class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                    Commission
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
