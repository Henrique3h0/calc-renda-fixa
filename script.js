// Função para atualizar o ícone do botão de acordo com o tema atual
function updateButtonIcon() {
    const currentTheme = getTheme();
    const button = document.querySelector('#theme-button');
    const icon = button.querySelector('img');
    if (currentTheme === 'dark') {
      icon.src = 'sun.svg';
      icon.alt = 'Alterar para tema claro';
    } else {
      icon.src = 'moon.svg';
      icon.alt = 'Alterar para tema escuro';
    }
  }

// Função para setar o tema atual no localStorage
function setTheme(theme) {
    localStorage.setItem('theme', theme);
  }
  
  // Função para obter o tema atual do localStorage
  function getTheme() {
    return localStorage.getItem('theme') || 'light';
  }
  
  // Função para atualizar a classe do body de acordo com o tema atual
  function updateTheme() {
    const theme = getTheme();
    const body = document.querySelector('body');
    body.className = `${theme}-mode`;
    const themeButtonIcon = document.querySelector('#theme-button i');
  if (theme === 'dark') {
    themeButtonIcon.className = 'fas fa-moon';
  } else {
    themeButtonIcon.className = 'fas fa-sun';
  }
    
  }
  
  // Evento disparado quando a página carregar
  window.addEventListener('load', () => {
    updateTheme();
    
  });
  
  // Evento disparado quando o botão for clicado
  const themeButton = document.querySelector('#theme-button');
  themeButton.addEventListener('click', () => {
    const currentTheme = getTheme();
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    setTheme(newTheme);
    updateTheme();
    const themeButtonIcon = document.querySelector('#theme-button i');
  if (theme === 'dark') {
    themeButtonIcon.className = 'fas fa-moon';
  } else {
    themeButtonIcon.className = 'fas fa-sun';
  }
  });
  
