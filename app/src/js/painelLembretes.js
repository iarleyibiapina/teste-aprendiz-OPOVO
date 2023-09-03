function alterar_url(nova) {
  if (confirm("Você tem certeza que deseja excluir tudo?")) {
    history.pushState({}, null, nova);
    location.reload();
  } else {
    alert("Operação cancelada!");
  }
}
