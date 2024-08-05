<!DOCTYPE html>
<html>

<head>
    <title>Forgot Password</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        /* Simple styles for the modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Forgot Password</h1>
        <form id="checkUserForm" onsubmit="checkUser(event)">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <div class="mb-4">
                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="full_name" name="full_name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    required>
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Check User</button>
        </form>
    </div>

    <!-- Password Reset Modal -->
    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 class="text-2xl font-bold mb-4">Change Password</h2>
            <form id="changePasswordForm" onsubmit="changePassword(event)">
                @csrf
                <div class="mb-4">
                    <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" id="new_password" name="new_password"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <div class="mb-4">
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        required>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Change Password</button>
            </form>
        </div>
    </div>

    <script>
        function checkUser(event) {
            event.preventDefault(); // ngăn sự kiện tải lại trang

            let formData = new FormData(document.getElementById('checkUserForm'));
            axios.post('/api/check-user', formData)
                .then(response => { //xử lý kết quả trả về thành công của request
                    if (response.data.status === 'success') {
                        document.getElementById('passwordModal').style.display = 'block';
                    }
                })
                .catch(error => {
                    alert('User not found');
                });
        }

        function changePassword(event) {
            event.preventDefault(); // ngăn sự kiện tải lại trang

            let formData = new FormData(document.getElementById('changePasswordForm'));
            formData.append('username', document.getElementById('checkUserForm').username.value);
            axios.post('/api/change-password', formData)
                .then(response => {
                    if (response.data.status === 'success') {
                        alert('Password changed successfully');
                        closeModal();
                        window.location.href = '/';
                    }
                })
                .catch(error => {
                    alert('Password change failed');
                });
        }

        function closeModal() {
            document.getElementById('passwordModal').style.display = 'none';
        }
    </script>
</body>

</html>
