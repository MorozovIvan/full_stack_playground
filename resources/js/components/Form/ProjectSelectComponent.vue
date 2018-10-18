<template>
    <div>
        <div class="form-group row" v-for="skill in skillList">
            <label :for="skill.id" class="col-sm-2 col-form-label">{{ skill.title }}</label>

            <div class="col-sm-4">
                <input v-if="parseInt(dynamic_field_id) === skill.id" v-model="dynamic" type="number" :name="'skills[' + skill.id + ']'" :id="skill.id" class="form-control" min="0" max="10" placeholder="Enter...">
                <input v-else type="number" :name="'skills[' + skill.id + ']'" v-model="skill.default_value" :id="skill.id" class="form-control" min="0" max="10" placeholder="Enter...">
            </div>
        </div>

        <div class="form-group">
            <label for="projectList">Projects</label>

            <select name="project[]" id="projectList" v-model="selectedProject" class="form-control" :multiple="multiple">
                <option v-for="project in projectList" :value="project.id">{{ project.title }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projectList: [],
                skillList: [],
                selectedProject: [],
                dynamic: 0,
                multiple: false,
            }
        },
        props: {
            dynamic_field_id: String
        },
        mounted() {
            axios.get(`/projects`).then(({data}) => {
                this.projectList = data;
            });

            axios.get(`/features`).then(({data}) => {
                console.log(data);
                this.skillList = data;
            });
        },
        methods: {

        },
        watch: {
            'dynamic': function (value) {
                this.multiple = parseInt(value) === 10;

                return true;
            }
        }
    }

</script>

