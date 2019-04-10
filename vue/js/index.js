Vue.component('todoList',{
    template: `<transition-group
                    name="fade"
                    v-if="todos.length"
                    tag="ul"
                    :style="ulStyle"
                    @leave="leaving=true"
                    @after-leave="leaving=false"
                >
                    <li
                        v-if="!todo.finished"
                        v-for="(todo,index) in todos"
                        :key='todo.key'
                    >
                        {{ todo.content }}
                        <button
                            @click="deleteItem(index)"
                        >
                            X
                        </button>
                    </li>
                </transition-group>
                <p
                    v-else
                >
                    You have nothing to do
                </p>`,
    props: {
        todos: {
            type: Array
        }
    },
    data: function(){
        return {
            leaving: false,
            ulStyle: {
                height: '200px',
                overflow: 'scroll',
                marginBottom: '10px'
            }
        };
    },
    mounted: function(){
        console.log(this.todos)
    },
    methods: {
        deleteItem: function(index){
            this.todos.splice(index,1)
        }
    }
})

Vue.component('todo-input',{
    template: `
        <div>
            <input
                v-model="toAdd"
                @keypress.enter="add"
                :class=""
            >
            <button
                @click="add"
            >
                Add
            </button>
        </div>
    `,
    data: function(){
        return {
            toAdd: '',
        }
    },
    methods: {
        add: function(){
            this.$emit("onadd",this.toAdd)
            this.toAdd = ''
        }
    }
})
var todoApp = new Vue({
    el: '#todo-app',
    data: {
        todos: [
            { content: "html", finished: false, key:0 },
            { content: "css", finished: false, key:1 },
            { content: "javaScript", finished: false, key:2 }
        ],
        next: 3
    },
    methods: {
        add: function(value){
            this.todos.splice(0,0, { content: value, finished: false, key: this.next++ })
        }
    }
})
