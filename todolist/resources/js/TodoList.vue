<script setup>
import { ref, reactive, watch, computed, onBeforeMount } from 'vue'
import { useStore } from 'vuex'
import axios from 'axios'
import KanbanBoard from './components/kanban/KanbanBoard.vue'
import ContainerModal from '@/components/modals/ContainerModal.vue'
import CloseIcon from '@/components/icons/CloseIcon.vue'
import SaveIcon from '@/components/icons/SaveIcon.vue'
import GithubIcon from '@/components/icons/GithubIcon.vue'

const store = useStore()
const displayContainerModal = ref(false)
const displayCardModal = ref(false)
const state = reactive({
    is_editing_title: false,
    temp_title: null,
})
const payload = computed(() => {
    return store.getters['vuello/getVuelloDatas']
})

onBeforeMount(async () => {
    const data = store.getters['vuello/getVuelloDatas']
    if (!data) {
        await axios.get('/api/tasks').then(({ data }) => {
            store.dispatch('vuello/setVuello', data.data)
        })
    }
})

const handleEditTitle = (type) => {
    if (type === 'edit') {
        state.is_editing_title = true
        state.temp_title = payload.value.title
    } else if (type === 'save') {
        state.is_editing_title = false
        payload.value.last_modified = new Date().toLocaleString('en-GB')
        store.dispatch('vuello/setVuello', payload.value)
    } else {
        state.is_editing_title = false
        payload.value.title = state.temp_title
    }
}
const openRepo = () => {
    window.open('https://github.com/khalifa-dv/do-list-system', '_blank')
}
</script>

<template>
    <div v-if="payload" class="flex h-screen flex-col p-4">
        <div class="flex justify-between">
            <div>
              
                <h3 class="my-2 px-2 text-sm">
                    Last Modified :
                </h3>
            </div>
            <div class="mt-px flex place-items-start justify-center">
                <div class="cursor-pointer rounded-full p-2 text-gray-500 hover:bg-slate-200" @click="openRepo">
                    <GithubIcon height="30px" />
                </div>
            </div>
        </div>
        <KanbanBoard :payload="payload" @addContainer="displayContainerModal = true" />
    </div>
    <!-- Container Modal -->

    <ContainerModal :value="displayContainerModal" @close="displayContainerModal = false" />
</template>
