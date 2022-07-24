#! /bin/bash

DOCKER_HOME=./docker
DOCKER_COMPOSE="docker-compose -f $DOCKER_HOME/docker-compose.yml"

function usage {
    cat <<EOF
$(basename ${0}) is a tool for ...

Usage:
  $(basename ${0}) [command] [<options>]

Options:
  stats|st          Dockerコンテナの状態を表示します。
  init              初期化します。（データベース・ログ）
  start             すべてのDaemonを起動します。
  stop              すべてのDaemonを停止します。
  mysql login       MySQLにログインします。
  --version, -v     バージョンを表示します。
  --help, -h        ヘルプを表示します。
EOF
}

function version {
    echo "$(basename ${0}) version 0.0.1 "
}

case ${1} in
    stats|st)
        docker container stats
    ;;

    init)
        # 停止＆削除（コンテナ・イメージ・ボリューム）
        $DOCKER_COMPOSE down --rmi all --volumes
        rm -Rf ./mysql/logs/*
        rm -Rf ./apache/logs/*
        rm -Rf ./php/logs/*
        rm -Rf ../public/wp-config.php
    ;;

    start)
        $DOCKER_COMPOSE up -d
    ;;
    
    stop)
        $DOCKER_COMPOSE down
    ;;
  
    apache)
      case ${2} in
          login)
              $DOCKER_COMPOSE exec apache /bin/sh
          ;;
          restart)
              $DOCKER_COMPOSE restart apache
          ;;
          *)
              usage
          ;;
      esac
    ;;

    mysql)
      case ${2} in
          login)
              mysql -u root -ppassword -h 127.0.0.1  
          ;;
          export)
              mysqldump -u root -ppassword -h 127.0.0.1 -A > ${3}
          ;;
          import)
              mysql -u root -ppassword -h 127.0.0.1 --default-character-set=utf8mb4 < ${3}
              $DOCKER_COMPOSE restart mysql
          ;;
          restart)
              $DOCKER_COMPOSE restart mysql
          ;;
          *)
              usage
          ;;
      esac
    ;;
      
    php)
      case ${2} in
          login)
              $DOCKER_COMPOSE exec php /bin/bash
          ;;
          *)
              usage
          ;;
      esac
    ;;
    
    
    help|--help|-h)
        usage
    ;;

    version|--version|-v)
        version
    ;;
    
    *)
        echo "[ERROR] Invalid subcommand '${1}'"
        usage
        exit 1
    ;;
esac


