<template>
  <q-form class="q-gutter-y-md" @submit.prevent="emit('submit', customer)">
    <q-input
      outlined
      stack-label
      label="Nome"
      v-model="customer.name"
      :rules="[(val) => !!val || 'Informe o nome']"
    />
    <q-input
      outlined
      stack-label
      type="email"
      label="E-mail"
      v-model="customer.email"
      :rules="[
        (val) => !!val || 'Informe o e-mail',
        (val) => /.+@.+\..+/.test(val) || 'E-mail inválido',
      ]"
    />
    <q-input
      outlined
      stack-label
      label="Telefone"
      mask="(##) #####-####"
      unmasked-value
      v-model="customer.phone"
    />
    <q-input
      outlined
      stack-label
      type="date"
      label="Data de nascimento"
      v-model="customer.birth_date"
    />
    <div class="full-width bg-grey-1 q-py-md">
      <q-btn-group spread flat>
        <q-btn
          flat
          no-caps
          :loading="saving"
          type="submit"
          label="Salvar"
          icon="save"
          color="positive"
        />
      </q-btn-group>
    </div>
  </q-form>
</template>

<script setup>
const emit = defineEmits(['submit'])

defineProps({
  saving: { type: Boolean, default: false },
})

const customer = defineModel({
  default: () => ({
    id: null,
    name: null,
    email: null,
    phone: null,
    birth_date: null,
  }),
})
</script>