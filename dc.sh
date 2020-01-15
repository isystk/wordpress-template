#! /bin/bash

pushd ./docker

MYSQL_CLIENT=$(dirname $0)/mysql/scripts
PATH=$PATH:$MYSQL_CLIENT

function usage {
    cat <<EOF
$(basename ${0}) is a tool for ...

Usage:
  $(basename ${0}) [command] [<options>]

Options:
  stats|st          Dockerコンテナの状態を表示します。
  apache start      Apacheを起動します。
  apache stop       Apacheを停止します。
  mysql start       MySQLを起動します。
  mysql stop        MySQLを停止します。
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

    all)
      case ${2} in
          init)
              # 停止＆削除（コンテナ・ネットワーク・イメージ）
              docker-compose down --rmi all
              rm -Rf ./mysql/data/*
              rm -Rf ./mysql/logs/*
              rm -Rf ./apache/logs/*
              rm -Rf ./php/logs/*
              rm -Rf ../public/wp-config.php
          start)
              docker-compose up -d
          ;;
          stop)
              docker-compose down
          ;;
          *)
              usage
          ;;
      esac
    ;;

    apache)
      case ${2} in
          start)
              docker-compose up -d apache
          ;;
          stop)
              docker-compose stop apache && docker-compose rm -fv apache
          ;;
          *)
              usage
          ;;
      esac
    ;;

    php)
      case ${2} in
          start)
              docker-compose up -d php
          ;;
          stop)
              docker-compose stop php && docker-compose rm -fv php
          ;;
          *)
              usage
          ;;
      esac
    ;;

    mysql)
      case ${2} in
          start)
              docker-compose up -d mysql
          ;;
          stop)
              docker-compose stop mysql && docker-compose rm -fv mysql
          ;;
          login)
              mysql -u root -ppassword -h 127.0.0.1
          ;;
          *)
              usage
          ;;
      esac
    ;;

    phpmyadmin)
      case ${2} in
          start)
              docker-compose up -d phpmyadmin
          ;;
          stop)
              docker-compose stop php && docker-compose rm -fv phpmyadmin
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


