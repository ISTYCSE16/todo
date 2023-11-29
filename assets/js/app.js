const app = Vue.createApp({
    data() {
        return {
            taskData: [],
            showModal: false,
            newTask: {
                task: '',
                task_type: '',
                required_time: '',
            },
            editTaskData: {
                id: null,
                task: '',
                task_type: '',
                required_time: '',
            },
        };
    },
    // created(){
    //     this.fetchData(); 
    //   },
    methods: {
        fetchData() {
            fetch('http://localhost/todo/index.php/crud/fetchData')
                .then(response => response.json())
                .then(data => {
                    this.taskData = data.task_data;
                    // this.loadView()
                    console.log(this.taskData);
                })
                .catch(error => console.error('Error:', error));
        },
        addTask() {
            fetch('http://localhost/todo/index.php/crud/addTask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    task: this.newTask.task,
                    task_type: this.newTask.task_type,
                    required_time: this.newTask.required_time
                }),
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data)
                    if (data.message === "Successfully Inserted Data To Database") {
                        this.showModal = false;
                        console.log(this.newTask.task, this.newTask.task_type, this.newTask.required_time);
                        this.fetchData();
                    } else {
                        console.error('Error adding task');
                    }
                })
                .catch(error => console.error('Error:', error));
        },
        editTask(id) {
            this.editTaskData.id = id;

            fetch(`http://localhost/todo/index.php/crud/getById/${id}`)
                .then(response => response.json())
                .then(data => {
                    this.editTaskData.task = data.task;
                    this.editTaskData.task_type = data.task_type;
                    this.editTaskData.required_time = data.required_time;
                    this.showModal = true;
                })
                .catch(error => console.error('Error:', error));
        },
        deleteTask(id) {
            fetch(`http://localhost/todo/index.php/crud/deleteTask/${id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.message === 'Successfully Deleted Task') {
                        this.fetchData();
                        // this.loadView();
                        // window.location.reload(true);
                        console.log(data);
                    } else {
                        console.error('Error deleting task');
                        console.log(data);
                    }
                })
                .catch(error => console.error('Error:', error));
        },
        saveEditedTask() {
            fetch(`http://localhost/todo/index.php/crud/updateTask/${this.editTaskData.id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(this.editTaskData),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.result) {
                        this.showModal = false;
                        this.fetchData();
                        // this.loadView()
                    } else {
                        console.error('Error updating task');
                    }
                })
                .catch(error => console.error('Error:', error));
        },
        // modalPopUp() {
        //     this.showModal = true
        //     console.log(showModal)
        // },
        // closeModal() {
        //     this.showModal = false
        //     console.log(showModal)
        // },
        toggleModal() {
            this.showModal = !this.showModal
            console.log(this.showModal)
        }
    },
    mounted() {
        this.fetchData();
    },
});

app.mount('#app');
